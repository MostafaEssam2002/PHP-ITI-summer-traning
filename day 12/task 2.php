<?php
class InvoiceItem {
    private string $id;
    private string $desc;
    private int $qty;
    private float $unitPrice;
    public function __construct(string $id, string $desc, int $qty, float $unitPrice) {
        $this->id = $id;
        $this->desc = $desc;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
    }
    public function getId(): string {
        return $this->id;
    }
    public function getDesc(): string {
        return $this->desc;
    }
    public function getQty(): int {
        return $this->qty;
    }
    public function getUnitPrice(): float {
        return $this->unitPrice;
    }
    public function setQty(int $qty): void {
        $this->qty = $qty;
    }
    public function setUnitPrice(float $unitPrice): void {
        $this->unitPrice = $unitPrice;
    }
    public function getTotal(): float {
        return $this->unitPrice * $this->qty;
    }
    public function __toString(): string {
        return "InvoiceItem[id={$this->id},desc={$this->desc},qty={$this->qty},unitPrice={$this->unitPrice}]";
    }
}
echo "<pre>";
$item = new InvoiceItem("A101", "Pen Red", 10, 1.20);
echo $item ;
echo "Total = " . $item->getTotal();
echo "</pre>";
?>