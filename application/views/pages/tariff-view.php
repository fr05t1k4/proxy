<div class="container" id="container">
    <h1>Тарифы</h1>
    <small>Выберите желаемый тариф.</small>
    
    <?php $this->report->show(); ?>
    
    <?php echo form_open(); ?>
    <table class="table table-striped">
        <tr>
            <td></td>
            <th>10 штук</th>
            <th>25 штук</th>
            <th>50 штук</th>
            <th>100 штук</th>
            <th>250 штук</th>
            <th>500 штук</th>
        </tr>
        <tr>
            <th>Сутки</th>
            <td>
                <label class="radio">
                    <input type="radio" name="tarif" value="1" <?php echo set_radio('tarif', '1', TRUE) ?> />3$
                </label></td>
            <td>
                <label class="radio">
                    <input type="radio" name="tarif" value="2" <?php echo set_radio('tarif', '2', $this->input->post('tarif') == 2) ?>/>6$
                </label>
            </td>
            <td>
                <label class="radio">
                    <input type="radio" name="tarif" value="3" <?php echo set_radio('tarif', '3', $this->input->post('tarif') == 3) ?>/>15$
                </label>
            </td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="4" <?php echo set_radio('tarif', '4', $this->input->post('tarif') == 4) ?>/>25$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="5" <?php echo set_radio('tarif', '5', $this->input->post('tarif') == 5) ?>/>50$
                </label></td>
            <td>--</td>
        </tr>
        <tr>
            <th>Неделя</th>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="6" <?php echo set_radio('tarif', 6, $this->input->post('tarif') == 6) ?>/>25$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="7" <?php echo set_radio('tarif', 7, $this->input->post('tarif') == 7) ?>/>50$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="8" <?php echo set_radio('tarif', 8, $this->input->post('tarif') == 8) ?>/>75$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="9" <?php echo set_radio('tarif', 9, $this->input->post('tarif') == 9) ?>/>100$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="10" <?php echo set_radio('tarif', 10, $this->input->post('tarif') == 10) ?>/>200$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="11" <?php echo set_radio('tarif', 11, $this->input->post('tarif') == 11) ?>/>350$
                </label></td>
        </tr>
        <tr>
            <th>Месяц</th>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="12" <?php echo set_radio('tarif', 12, $this->input->post('tarif') == 12) ?>/>75$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="13" <?php echo set_radio('tarif', 13, $this->input->post('tarif') == 13) ?>/>150$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="14" <?php echo set_radio('tarif', 14, $this->input->post('tarif') == 14) ?>/>250$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="15" <?php echo set_radio('tarif', 15, $this->input->post('tarif') == 15) ?>/>500$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="16" <?php echo set_radio('tarif', 16, $this->input->post('tarif') == 16) ?>/>750$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="17" <?php echo set_radio('tarif', 17, $this->input->post('tarif') == 17) ?>/>1200$
                </label></td>
        </tr>

    </table>
    <div class="form-actions"><input type="submit" class="pull-right btn" value="Купить" /></div>
        <?php echo form_close(); ?>
</div>