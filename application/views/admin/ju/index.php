<?php get_header('admin'); ?>
<link rel="stylesheet" href="http://harvesthq.github.io/chosen/chosen/chosen.css" />

<!--<table class="table">
    <tr>
        <td width="100">Kode Kas</td>
        <td>
            <select>
                <option>Kas Masuk</option>
                <option>Kas Keluar</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><input type="text" name="tanggal"></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td><textarea class="input-block-level"></textarea> </td>
    </tr>
</table>-->
<table class="table-bordered span7">
    <thead>
        <tr>
            <th>Perkiraan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>-</th>
        </tr>
    </thead>
    <tbody id="row_ju">
        <tr>
            <td>
                <div class="perkiraan">                    
                    <select data-placeholder="Choose a Country" class="chzn-select" style="width:350px;" name="perkiraan1">
                        <option value=""></option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
            </td>
            <td><input type="text" name="nama1"></td>
            <td><input type="text" name="debet1"></td>
            <td><input type="checkbox" naname="delete" /></td>
        </tr>
    </tbody>
</table>

<button id="button_add_row">Add Row</button>
<script src="http://harvesthq.github.io/chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
<script>
    var num = 1;
    $('#button_add_row').click(function() {
        var perkiraan = $(".perkiraan").html();        
        num++;
        $('tbody').append('<tr class="row' + num + '">\n\
                            <td><div class="select_perkiraan' + num + '"></div></td>\n\
                            <td><input type="text" name="debet' + num + '"></td>\n\
                            <td><input type="text" name="kredit' + num + '"></td>\n\
                            <td><input type="checkbox" name="delete' + num + '" /></td>\n\
                      </tr>');
        $(".select_perkiraan" + num).append(perkiraan);                
        
    });
    $(".chzn-select").chosen();
//    $(".chzn-select-deselect").chosen({allow_single_deselect: true});
</script>


<?php get_footer('admin'); ?>