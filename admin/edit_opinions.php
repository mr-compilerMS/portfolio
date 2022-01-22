<?php include_once '../config/database.php'; ?>
<script src="<?= $base_url ?>assets\js\opinionedit.js"></script>

<!--Add Edit Opinions Modal -->
<div class="modal fade" id="editOpinionsDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editOpinionsDialogLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOpinionsDialogLabel">Edit Opinions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php

                $sql = "SELECT * FROM `opinions` where active=1";
                $result = $conn->query($sql);
                if (!isset($result) || !isset($result->num_rows)) return;

                ?>

                <table id="editOpinionsTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-25">Photo</th>
                            <th>Name</th>
                            <th>Opinion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr id="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                                <td><img src="<?= $base_url ?><?php echo $row['imgUrl']; ?>" alt="" width="40px"></td>
                                <td><?php echo $row['name']; ?></td>
                                <td class="opinion"><?php echo $row['opinion']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-add">Add New</button>
                <button type="button" class="btn btn-success" onclick="saveTable(event)">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function saveTable(e) {
        $('#editOpinionsTable tr.editing button.btn-accept').click();
        $('#editOpinionsDialog button.btn-close-modal').click();
        // $.get('<?= $base_url ?>/components/opinions.php', (data) => {
        //     $('#opinions-view').html(data);
        // });
    }
    $(document).ready(function() {
        $('#editOpinionsTable').OpinionEdit({
            columnsEd: null,
            $addButton: $('#editOpinionsDialog .btn-add'),
            imageColumn: true,
            onEdit: function(column) {
                var imgUrl = column.find('img').attr('src');
                var id = column.attr('data-id');
                var imageUpdate = column.attr('image-updated');
                column.attr('image-updated', false);
                var name = column.find('td:eq(1)').text();
                var opinion = column.find('td:eq(2)').text();
                if (name === '' && opinion === '' && imgUrl === '') return;
                if (id)
                    $.post('<?= $base_url ?>admin/ajax/opinion.php', {
                        imgUrl: imgUrl,
                        name: name,
                        id: id,
                        imageUpdate,
                        opinion: opinion
                    }, function(data) {

                        data = JSON.parse(data);
                        $opinion = $("#opinion-" + id);
                        $opinion.find('.opinion-client').attr('src', data.imgUrl);
                        $opinion.find('.opinion-client-name').text(data.name);
                        $opinion.find('.opinion-client-opinion').text(data.opinion);
                    })
                else
                    $.post('<?= $base_url ?>admin/ajax/opinion.php', {
                        imgUrl: imgUrl,
                        name: name,
                        imageUpdate,
                        id: '',
                        opinion: opinion
                    }, function(data) {
                        data = JSON.parse(data);
                        column.attr('data-id', data);
                    })
            },
            onBeforeDelete: function(row) {
                var id = row.attr('data-id');
                if (id === null || id === undefined || id === '')
                    $(row).remove();
                else
                    $.post('<?= $base_url ?>admin/ajax/opinion.php', {
                        delete: true,
                        id: id
                    }, function(data) {
                        let response = JSON.parse(data)
                        if (response.success)
                            $(row).remove();
                    });
            }
        });
    })
</script>