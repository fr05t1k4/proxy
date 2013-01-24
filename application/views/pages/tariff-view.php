<div class="container" id="container">
    <h1>Тарифы</h1>
    <small>Выберите желаемый тариф.</small>
    <?php echo form_open('proxy/get_proxy'); ?>
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
                    <input type="radio" name="tarif" value="3-1-10"/>3$
                </label></td>
            <td>
                <label class="radio">
                    <input type="radio" name="tarif" value="6-1-25"/>6$
                </label>
            </td>
            <td>
                <label class="radio">
                    <input type="radio" name="tarif" value="15-1-50"/>15$
                </label>
            </td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="25-1-100"/>25$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="50-1-250"/>50$
                </label></td>
            <td>--</td>
        </tr>
        <tr>
            <th>Неделя</th>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="25-7-10"/>25$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="50-7-25"/>50$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="75-7-50"/>75$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="100-7-100"/>100$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="200-7-250"/>200$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="350-7-500"/>350$
                </label></td>
        </tr>
        <tr>
            <th>Месяц</th>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="75-30-10"/>75$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="150-30-25"/>150$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="250-30-50"/>250$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="500-30-100"/>500$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="750-30-250"/>750$
                </label></td>
            <td> <label class="radio">
                    <input type="radio" name="tarif" value="1200-30-500"/>1200$
                </label></td>
        </tr>
        
    </table>
    <div class="form-actions"><input type="submit" class="pull-right btn" value="Купить" /></div>
    <?php echo form_close(); ?>
</div>