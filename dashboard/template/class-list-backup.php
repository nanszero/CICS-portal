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

            <!-- GET GRADE, SECTION AND ADVISER -->
            <div class="row">
            <?php
            $gradeLevels = $this->customlib->getGradeSectionAdviser();
        
            foreach($gradeLevels as $row){
                echo '<span class="bg-primary btn-block text-white p-2 text-center" style="box-shadow: 4px 4px 10px rgb(69 65 78 / 18%);">
                        <h3 class="h5 pb--5"><b> '.$row->level.' - '.$row->section.'  </b> (Class Adviser: '.$row->adviser.')</h3>
                        <small style="margin-top:-15px"></small>
                    </span>';
                ?>

                <!-- GET SECTION, TEACHER AND STUDENT COUNTS -->
                <?php
                $id_class 		= $row->id;
                $id_sy 			= $row->id_sy;
                $id_adviser 	= $row->id_adviser;
                $id_grade_level = $row->id_grade_level;
                $id_section 	= $row->id_section;
                $id_subject 	= $row->id_subject;
                $teachers_sections = $this->customlib->getSubjectTeachersStudentcount($id_class,$id_sy,$id_adviser,$id_grade_level,$id_section,$id_subject);
                foreach($teachers_sections as $row1){
                    ?>
                    <div class="col-md-4 mb-5 mt-4">
                        <div class="card card-post card-round">
                            <div class="card-body" style="box-shadow: 4px 4px 10px rgb(69 65 78 / 18%);">
                                <div class="d-flex">
                                    <div class="avatar">
                                        <img src="<?= base_url()?>public/uploads/dp/<?= $row1->picture?>" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-post ml-2">
                                        <p class="username"><?= $row1->teacher?></p>
                                        <p class="date text-muted"><?= $row1->subject?></p>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="card-category text-black mb-1" align="center">There are <?= $row1->student_count ?> students in this room</p>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                <?php
                                if($class_template_usage == 'show_grades'){
                                    ?>
                                        <a href="<?= base_url()?>admin/grades/view_grade/<?= $row1->id_class ?>" class="btn btn-warning btn-rounded btn-sm btn-block">View Class & Grade</a>
                                    <?php
                                }else if($class_template_usage == 'show_class'){
                                    ?>
                                        <a href="<?= base_url()?>admin/classes/view_class/<?= $row1->id_class ?>" class="btn btn-warning btn-rounded btn-sm btn-block">View Class</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php
                }
            }
            ?>
            </div>


        </div>
    </div>
</div>