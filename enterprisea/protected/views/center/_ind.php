<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-hover mb30">
            <tbody>
                <tr>
                    <td width="30%">School Type :</td>
                    <td><?php echo $center->type->type;?></td>
                </tr>
                <tr>
                    <td width="30%">Center Name :</td>
                    <td><?php echo $center->center_name;?></td>
                </tr>
                <tr>
                    <td><h4>Principal Personal Information</h4></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Name :</td>
                    <td><?php echo $center->fullname; ?></td>
                </tr>
                <tr>
                    <td>Date Of Birth :</td>
                    <td><?php echo $center->dob; ?></td>
                </tr>
                <tr>
                    <td>ID/Passport Number :</td>
                    <td><?php echo $center->passport_id;?></td>
                </tr>
                <tr>
                    <td>Age :</td>
                    <td><?php echo $center->age; ?></td>
                </tr>
                <tr>
                    <td>Nationality :</td>
                    <td><?php echo Nationality::model()->findByAttributes(array('id'=>$center->nationality))->name;?></td>
                </tr>
                <tr>
                    <td><h4>Contact Details</h4></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Cell Number :</td>
                    <td><?php echo $center->cell_no; ?></td>
                </tr>
                <tr>
                    <td>Home Number :</td>
                    <td><?php echo $center->home_no; ?></td>
                </tr>
                <tr>
                    <td>Center Number :</td>
                    <td><?php echo $center->center_no; ?></td>
                </tr>
                <tr>
                    <td>Email-Address :</td>
                    <td><?php echo $center->email; ?></td>
                </tr>
                <tr>
                    <td>Website :</td>
                    <td><?php echo $center->website; ?></td>
                </tr>
                <tr>
                    <td>Skype Name :</td>
                    <td><?php echo $center->skype; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>