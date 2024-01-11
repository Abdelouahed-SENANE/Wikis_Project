<?php

interface InterfaceCategory {
    public function addCategory(Category $newCategory);
    public function fetchAllCategories();
    public function deleteCategory($id_category);
}