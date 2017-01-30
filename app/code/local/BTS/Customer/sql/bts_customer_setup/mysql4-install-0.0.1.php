<?php
 
$installer = $this;
$installer->startSetup();
 
$installer->addAttribute('customer', 'samples_ordered', array(
    'label'         => 'Number of samples ordered',
    'type'          => 'int',
    'input'         => 'text',
    'visible'       => true,
    'required'      => false,
    'position'      => 9999,
));
 
$installer->endSetup();

