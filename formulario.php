<?php
require_once './i_bootstrap.php';

interface element {

    public function element_input($input_type, $input_name, $input_id,  $input_label);

    public function element_textarea($rows, $cols, $label);

    public function element_checkbox($checkbox_label, $checkbox_name, array $checkbox_value, array $checkbox_text);

    public function element_select($option_label, array $option_name, array $option_value) ;
}

class elements implements element {

    public $action = '';
    public $method = '';
    public $input_name = '';
    public $input_id = '';
    public $input_label = '';
    public $rows = '';
    public $cols = '';
    public $text = '';
    public $option_label = '';
    public $option_name = array();
    public $option_value = array();
    public $checkbox_name = '';
    public $checkbox_text = array();
    public $checkbox_value = array();
    public $input_type = '';
    public $size = '';
    public $textarea_label= '';

    public function element_input($input_type, $input_name, $input_id,  $input_label) {

        $this->input_type = $input_type;
        $this->input_name = $input_name;
        $this->input_id = $input_id;
        $this->input_label = $input_label;
        ?>

        <label><?php echo $input_label; ?></label>
        <input type="<?php echo $this->input_type; ?>" name="<?php echo $this->input_name; ?>" id="<?php echo $this->input_id; ?>">

        <?php
    }

    public function element_textarea($rows, $cols, $textarea_label) {

        $this->textarea_label = $textarea_label;
        $this->rows = $rows;
        $this->cols = $cols;
        ?>
        <label><?php echo $this->textarea_label; ?></label><br>
        <textarea rows="<?php echo $this->rows; ?>" cols="<?php echo $this->cols; ?>"></textarea>

        <?php
    }

    public function element_checkbox($checkbox_label, $checkbox_name, array $checkbox_value, array $checkbox_text) {

        $this->checkbox_name = $checkbox_name;
        $this->checkbox_value = $checkbox_value;
        $this->checkbox_text = $checkbox_text;
        $this->checkbox_label = $checkbox_label;

        $arrlength = count($checkbox_value);

        ?>
        
        <label><?php echo $checkbox_label; ?></label><br>
        
        <?php
        
        for ($i = 1; $i < $arrlength; $i++) {
            ?>
            
            <input type="checkbox" name="<?php echo $this->checkbox_name; ?>" value="<?php echo $i; ?>"><?php echo $this->checkbox_text[$i]; ?><br>

            <?php
        }
    }

    public function element_select($option_label, array $option_name, array $option_value) {

        $this->option_name = $option_name;
        $this->option_value = $option_value;
        $this->option_label = $option_label;

        $arrlength = count($option_value);
        ?>
        
        <label><?php echo $option_label; ?></label><br>
        <select>
            <?php
            for ($j = 0; $j < $arrlength; $j++) {
                ?>
                <option value="<?php echo $option_value[$j]; ?>"><?php echo $option_name[$j]; ?></option>
                <?php
            }
            ?>
        </select>            
        <?php
    }

}

class formulario extends elements {

    public function __construct($action, $method, $input_name, $input_id, $input_label, $rows, $cols, $option_name, $option_value, $option_label, $checkbox_name, $checkbox_value, $checkbox_text, $checkbox_label, $input_type, $size, $textarea_label) {
        
        $this->action = $action;
        $this->method = $method;
        $this->input_name = $input_name;
        $this->input_id = $input_id;
        $this->input_label = $input_label;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->checkbox_name = $checkbox_name;
        $this->checkbox_value = $checkbox_value;
        $this->checkbox_text = $checkbox_text;
        $this->checkbox_label = $checkbox_label;
        $this->option_label = $option_label;        
        $this->option_name = $option_name;
        $this->option_value = $option_value;
        $this->input_type = $input_type;
        $this->size = $size;
        $this->textarea_label = $textarea_label;
    }

    public function render() {

        echo '<container>';
        echo '<form name="teste" action="' . $this->action . '" method="' . $this->method . '"><br><br>';
        echo $this->element_input($this->input_type, $this->input_name, $this->input_id,  $this->input_label).'<br><br>';
        echo $this->element_checkbox($this->checkbox_label, $this->checkbox_name, $this->checkbox_text, $this->checkbox_value).'<br><br>';
        echo $this->element_select($this->option_label, $this->option_name, $this->option_value).'<br><br>';
        echo $this->element_textarea($this->rows, $this->cols, $this->textarea_label).'<br><br>';
        echo '</form>';
        echo '</container>';
    }

}

$input_label    = 'Nome da Empresa';
$action         = 'teste.php';
$method         = 'post';
$input_name     = 'teste';
$input_id       = 'teste';
$rows           = 10;
$cols           = 20;
$option_label   = 'Marcas de veículos';
$option_name    = array ('Ford', 'Chevrolet', 'Hiunday', 'Renault', 'Peugeout');
$option_value   = array ('Ford', 'Chevrolet', 'Hiunday', 'Renault', 'Peugeout');
$checkbox_label = 'Marcas de veículos';
$checkbox_name  = 'Veiculos';
$checkbox_value = array ('Ford', 'Chevrolet', 'Hiunday', 'Renault', 'Peugeout');
$checkbox_text  = array ('Ford', 'Chevrolet', 'Hiunday', 'Renault', 'Peugeout');
$input_type     = 'text';
$size           = 10;
$textarea_label = 'escreva seu comentario';

$formulario = new formulario($action, $method, $input_name, $input_id, $input_label, $rows, $cols, $option_name, $option_value, $option_label, $checkbox_name, $checkbox_value, $checkbox_text, $checkbox_label, $input_type, $size, $textarea_label);
$formulario->render();
