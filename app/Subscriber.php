<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function trash() {


        // trash details
        $this->trashDetails();

        // trash original products
        $this->trashSelf();
    }

    /**
     * Trash details of product.
     *
     * @return void
     */
    protected function trashDetails() {
        $this->delete();
    }

    /**
     * Trash the self product.
     *
     * @return void
     */
    protected function trashSelf() {
        $this->delete();
    }

}
