                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Skill</th>
                    </thead>
                    <tbody>
                    <?php 
                        if($skill->num_rows() > 0):
                        $no = 1;
                        $skill_tmp = [];
                            foreach ($skill->result() as $baris):
                            if(!in_array($baris->id_skill, $skill_tmp)):
                                $skill_tmp[] = $baris->id_skill;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $baris->nama_skill ?></td>
                            </tr>
                            <?php
                            endif;
                            ?>
                            <?php
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="2">Data Skill Tidak Ditemukan</td>
                            </tr>

                        <?php
                        endif;
                    ?>
                    </tbody>
                </table>