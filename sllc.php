<?php
// Node class for storing item information
class ItemNode
{
    public $itemName;
    public $quantity;
    public $next;

    public function __construct($itemName, $quantity)
    {
        $this->itemName = $itemName;
        $this->quantity = $quantity;
        $this->next = null;
    }
}

// Circular linked list class for managing items
class CircularItemList
{
    private $head = null;
    private $tail = null;

    // Method to add a new item
    public function addItem($itemName, $quantity)
    {
        $newItem = new ItemNode($itemName, $quantity);
        if ($this->head === null) {
            $this->head = $newItem;
            $this->tail = $newItem;
            $this->tail->next = $this->head; // Making the list circular
        } else {
            $this->tail->next = $newItem;
            $this->tail = $newItem;
            $this->tail->next = $this->head; // Maintain circularity
        }
    }

    // Method to display all items
    public function displayItems()
    {
        if ($this->head === null) {
            return "No items available.";
        }

        $current = $this->head;
        $itemsOutput = "";
        do {
            $itemsOutput .= "Item: " . $current->itemName . ", Quantity: " . $current->quantity . "\n";
            $current = $current->next;
        } while ($current !== $this->head);

        return $itemsOutput;
    }
}

// Example usage of CircularItemList
$itemList = new CircularItemList();
$itemList->addItem("Laptop", 10);
$itemList->addItem("Printer", 5);
$itemList->addItem("Scanner", 3);

// Display all items
echo "Available Items in Warehouse:\n";
echo $itemList->displayItems();
?>