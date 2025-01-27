<?php 

class Migration {
    public function migrate() {
        $models = $this->getModels();
        var_dump($models);
    }

    private function getModels() {
        $filesNames = scandir('./../app/Models');
        $listOfModels = [];
        if ($filesNames != null) {
            $listOfModels = $this->resolveListOfModels($filesNames);
        }

        return $this->getAttributs($listOfModels);

    }

    private function resolveListOfModels(array $filesNames) {
        $listOfModelsResolved = [];
        foreach($filesNames as $item) {
            if ($item != '.' && $item != '..') {
                array_push($listOfModelsResolved, str_replace('.php', "", $item));   
            }
        }

        return $listOfModelsResolved;
    }

    private function getAttributs(array $listOfModels) {
        $listOfModelsWithProperties = [];
        foreach ($listOfModels as $value) {
            $reflect = new ReflectionClass($value);

            if (!$reflect->isAbstract()) {
                $props   = $reflect->getProperties(
                    ReflectionProperty::IS_PUBLIC | 
                    ReflectionProperty::IS_PROTECTED | 
                    ReflectionProperty::IS_PRIVATE);
                
                foreach ($props as $prop) {
                    $listOfModelsWithProperties[$value][] = $prop->getName();
                }
            }

        }
        return $listOfModelsWithProperties;
    }
}