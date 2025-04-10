<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SpreadsheetServiceTest extends TestCase
{
    use RefreshDatabase;
    private function createCsv(array $lines)
    {
        $fp = fopen('data.csv', 'w');

        foreach ($lines as $line)
            fputcsv($fp, $line);

        fclose($fp);
        return $fp;
    }
    /**
     * A basic feature test to create product from csv.
     */
    public function test_product_create(): void
    {
        $data = [
            [Str::random(20), random_int(1, 10000000)],
        ];
        $fp = $this->createCsv($data);

        app(SpreadsheetService::class)->processSpreadsheet($fp);

        $this->assertDatabaseHas(Product::class, [
            'product_code' => $data[0][0],
            'quantity' => $data[0][1],
        ]);
        $this->assertDatabaseCount(Product::class, 1);
        Queue::assertPushed(ProcessProductImage::class, 1);
    }


    /**
     * A basic feature test to create unique product from csv.
     */
    public function test_product_create_unique(): void
    {
        $productCode = Str::random(20);
        $data = [
            [$productCode, random_int(1, 10000000)],
            [$productCode, random_int(1, 10000000)],
        ];
        $fp = $this->createCsv($data);

        app(SpreadsheetService::class)->processSpreadsheet($fp);

        $this->assertDatabaseHas(Product::class, [
            'product_code' => $data[0][0],
            'quantity' => $data[0][1],
        ]);
        $this->assertDatabaseCount(Product::class, 1);
        Queue::assertPushed(ProcessProductImage::class, 1);
    }

    /**
     * A basic feature test to create unique product from csv.
     */
    public function test_dosnt_create_product_with_negative_quantity(): void
    {
        Queue::fake();
        $productCode = Str::random(20);
        $data = [
            [$productCode, random_int(-10000, 0)],
        ];
        $fp = $this->createCsv($data);

        app(SpreadsheetService::class)->processSpreadsheet($fp);

        $this->assertDatabaseCount(Product::class, 0);
        Queue::assertNothingPushed();
    }
}
