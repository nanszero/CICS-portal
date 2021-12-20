        <div class="card-body">
            <div class="table-responsive">
                <table id="multi-filter-select" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th hidden>ID Grade/Level</th>
                            <th>Grade/Level</th>
                            <th>Section</th>
                            <th>Adviser</th>
                            <th>Teacher</th>
                            <th>Subject</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($class_details as $info){
                            ?>
                            <tr>
                                <td hidden><?= $info->id_grade_level ?></td>
                                <td><?= $info->level ?></td>
                                <td><?= $info->section ?></td>
                                <td><?= $info->adviser_name ?></td>
                                <td><?= $info->teacher_name ?></td>
                                <td><?= $info->subject ?></td>
                                <td>
                                    <div class="btn-group">
                                    <a href="<?= base_url()?>admin/classes/view_class/<?= $info->id_class ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Class</a>
                                    <a href="<?= base_url()?>admin/grades/view_grade/<?= $info->id_class ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Grades</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

          


        </div>
    </div>
</div>