<?php

namespace W2\Minicart\Plugin;

use Magento\Quote\Model\Quote\Item;

class DefaultItem {
    public function aroundGetItemData($subject, \Closure $proceed, Item $item){
        $data = $proceed($item);
        $product = $item->getProduct();

        $atts = [
            "product_manufacturer" => $product->getAttributeText('manufacturer'),
            "product_part_number" =>$product->getAttributeText('product_part_number')
        ];
        return array_merge($data, $atts);
    }
}


?>