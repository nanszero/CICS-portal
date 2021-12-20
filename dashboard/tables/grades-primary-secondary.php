<div class="table-responsive">
    <table id="multi-filter-select" class="display table table-striped table-hover studenGrades" >
        <thead>
            <tr>
                <th>Student</th>
                <th>1st Quarter</th>
                <th>2nd Quarter</th>
                <th>3rd Quarter</th>
                <th>4rth Quarter</th>
                <th>Average</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($get_students as $row): ?>
                <tr>
                    <td><?= $row->name ?></td>
                    <td hidden><?= $row->id ?></td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="first<?= $row->id ?>" id="first<?= $row->id ?>" value="<?= number_format($row->first_quarter,2) ?>" oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="second<?= $row->id ?>" id="second<?= $row->id ?>" value="<?= number_format($row->second_quarter,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="third<?= $row->id ?>" id="third<?= $row->id ?>" value="<?= number_format($row->third_quarter,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="fourth<?= $row->id ?>" id="fourth<?= $row->id ?>" value="<?= number_format($row->fourth_quarter,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                    <div class="form-group form-group-small ">
                            <input type="text" readonly name="average<?= $row->id ?>" id="average<?= $row->id ?>" value="<?= number_format($row->average,2) ?>"  class="form-control" >
                        </div>
                    </td>
                    <td width="250px;">
                        <div class="form-group form-group-small ">
                            <input type="text" name="remarks<?= $row->remarks ?>" id="remarks<?= $row->remarks ?>" value="<?= $row->remarks ?>" class="form-control">
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>