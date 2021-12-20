<div class="table-responsive">
    <table id="multi-filter-select" class="display table table-striped table-hover studenGrades" >
        <thead>
            <tr>
                <th>Student</th>
                <th>Midterm</th>
                <th>Finals</th>
                <th>1st Sem (Ave)</th>
                <th>Midterm</th>
                <th>Finals</th>
                <th>2nd Sem (Ave)</th>
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
                            <input type="text" name="first_midterm<?= $row->id ?>" id="first_midterm<?= $row->id ?>" value="<?= number_format($row->first_midterm,2) ?>" oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="first_finals<?= $row->id ?>" id="first_finals<?= $row->id ?>" value="<?= number_format($row->first_finals,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" readonly name="first_sem<?= $row->id ?>" id="first_sem<?= $row->id ?>" value="<?= number_format($row->first_sem,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="second_midterm<?= $row->id ?>" id="second_midterm<?= $row->id ?>" value="<?= number_format($row->second_midterm,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-small ">
                            <input type="text" name="second_finals<?= $row->id ?>" id="second_finals<?= $row->id ?>" value="<?= number_format($row->second_finals,2) ?>"  oninput="getAverage(<?= $row->id ?>)" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </td>
                    <td>
                    <div class="form-group form-group-small ">
                            <input type="text" readonly name="second_sem<?= $row->id ?>" id="second_sem<?= $row->id ?>" value="<?= number_format($row->second_sem,2) ?>"  class="form-control" >
                        </div>
                    </td>
                    <td width="250px;">
                        <div class="form-group form-group-small ">
                            <input type="text" name="remarks<?= $row->remarks ?>" id="remarks<?= $row->remarks ?>" value="<?= $row->remarks ?>"  class="form-control">
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>