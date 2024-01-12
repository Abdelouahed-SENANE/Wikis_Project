<?php

    interface InterfaceTags {
        public function fetchAllTags();
        public function addTag(Tags $newTags);
        public function updateTag(Tags $updateTag);
        public function deleteTag($id_tag);

    }

?>