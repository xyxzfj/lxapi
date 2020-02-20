<?php

namespace Lexiangla\Openapi;

Trait ClazzTrait
{
    public function postClazz($staff_id, $attributes, $options = [])
    {
        $document = [
            'data' => [
                'type' => 'clazz',
                'attributes' => $attributes,
            ]
        ];
        $relationships = &$document['data']['relationships'];
        if (!empty($options['category_id'])) {
            $relationships['category']['data'] = [
                'type' => 'category',
                'id' => $options['category_id'],
            ];
        }
        if (!empty($options['privilege'])) {
            $relationships['privilege']['data'] = $options['privilege'];
        }

        echo json_encode($document) . PHP_EOL;
        return $this->forStaff($staff_id)->post('classes', $document);
    }
}
