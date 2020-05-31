<?php



function tpyts_modify_store_metabox_labels($labels) {

  $labels->featured_image = __('Logotipo', 'tpyts');
  $labels->set_featured_image = __('Selecciona logotipo', 'tpyts');
  $labels->remove_featured_image = __('Elimina logotipo', 'tpyts');
  $labels->use_featured_image = __('Usa como logotipo', 'tpyts');

  return $labels;
}

add_filter(
  'post_type_labels_store',
  'tpyts_modify_store_metabox_labels',
  10,
  1
);