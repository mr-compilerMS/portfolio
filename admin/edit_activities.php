<?php include_once '../config/database.php'; ?>
<?php include_once '../config/fieldvalues.php'; ?>
<?php
$base_url = url();

?>


<!--Add Edit Activities Modal -->
<div class="modal fade" id="editActivitiesDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editActivitiesDialogLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editActivitiesDialogLabel">Edit Activities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php

                $sql = "SELECT * FROM activities order by `date` desc";

                $result = $conn->query($sql);
                if (!isset($result) || !isset($result->num_rows)) return;

                ?>

                <table id="editActivitiesTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr id="activity<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                                <td><img class="activity-image" src="<?= $base_url ?><?php echo $row['imgUrl']; ?>" alt="<?php echo $row['title']; ?>" width="40px"></td>
                                <td class="activity-title"><?php echo $row['title']; ?></td>
                                <td class="activity-description ellipsis"><?php echo $row['description']; ?></td>
                                <td class="activity-category"><?php echo $row['category']; ?></td>
                                <td class="activity-date"><?php echo $row['date']; ?></td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-default" data-bs-target="#editActivityModal" onclick="editActivity(this);"><span class="bi bi-pencil"> </span></button>
                                        <button type="button" class="btn btn-sm btn-default" onclick="deleteActivity(this);"><span class="bi bi-trash"> </span></button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-add" onclick="addNewActivity(this)">Add New</button>
                <!-- <button type="button" class="btn btn-success" onclick="saveActivitiesTable(event)">Save</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editActivityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" onsubmit="handleActivityEdit(event)">
            <div class="modal-header">
                <h5 class="modal-title" id="editActivityModalLabel">Edit activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="activityId" id="activityId" />
                <input type="hidden" id="activityImageChanged" value="false" name="activityImageChanged" />
                <input type="hidden" id="activityImage" name="activityImage" />

                <div class="mb-1">
                    <label for="activityTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" name="activityTitle" id="activityTitle" placeholder="Title">
                </div>
                <div class="mb-1">
                    <label for="activityImage" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control form-control-sm" onchange="activityImageChange(event)" placeholder="Image">
                </div>
                <div class="row mb-1">
                    <div class="col-6">
                        <label for="activityCategory" class="form-label">Category</label>
                        <!-- <input type="text" class="form-control" name="activityCategory" placeholder="Category"> -->
                        <input list="categories" type="text" class="form-control" id="activityCategory" name="activityCategory" placeholder="Category" />
                        <datalist id="categories">
                            <?php
                            $sql = "SELECT distinct(`category`) FROM `activities` order by `category`";
                            $catsresult = $conn->query($sql);
                            while ($row = $catsresult->fetch_assoc()) {
                                echo '<option value="' . $row['category'] . '">';
                            } ?>
                        </datalist>
                    </div>
                    <div class="col-6">
                        <label for="activityDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="activityDate" name="activityDate" placeholder="Date">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="activityDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="activityDescription" name="activityDescription" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= $base_url ?>assets/vendor/bootbox/bootbox.min.js"></script>
<script>
    var editActivityModal = new bootstrap.Modal(document.getElementById('editActivityModal'), {
        keyboard: false
    })


    function deleteActivity(btn) {
        let tr = $(btn.parentNode.parentNode.parentNode);
        let activityId = tr.attr('data-id');

        // generate prompt to check if user really wants to delete
        bootbox.confirm({
            message: 'Are you sure you want to delete this activity?',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: (res) => {
                if (res) {
                    $('#cover-spin').show(0)
                    $.post('<?= $base_url ?>admin/ajax/activities.php', {
                            data: JSON.stringify({
                                activityId: activityId,
                                action: 'delete'
                            })
                        },
                        function(res) {
                            res = JSON.parse(res);
                            if (res.success) {
                                $('#cover-spin').hide(0);
                                tr.remove();
                            } else {
                                alert(res);
                            }
                        });
                }

            },

        })


    }

    function editActivity(btn) {
        let tr = $(btn.parentNode.parentNode.parentNode);
        let activityId = tr.attr('data-id');
        if (document.getElementById('activityId').value !== activityId) {
            document.getElementById('activityTitle').value = tr.find('.activity-title').text();
            document.getElementById('activityDescription').value = tr.find('.activity-description').text();
            document.getElementById('activityCategory').value = tr.find('.activity-category').text();
            document.getElementById('activityDate').value = tr.find('.activity-date').text();
            document.getElementById('activityId').value = tr.attr('data-id');
            document.getElementById('activityImage').value = ''
            document.getElementById('activityImageChanged').value = 'false';
        }
        editActivityModal.toggle();
    }

    function addNewActivity(btn) {
        document.getElementById('activityTitle').value = '';
        document.getElementById('activityDescription').value = '';
        document.getElementById('activityCategory').value = '';
        document.getElementById('activityDate').value = '';
        document.getElementById('activityId').value = '';
        document.getElementById('activityImage').value = ''
        document.getElementById('activityImageChanged').value = 'false';
        editActivityModal.toggle();
    }


    function activityImageChange(e) {
        var img = e.target.files[0];
        if (
            !pixelarity.open(
                img,
                true,
                function(res) {
                    $('#activityImage').val(res);
                    $('#activityImageChanged').val(true);
                },
                "jpg",
                1
            )
        ) {
            alert("Whoops! That is not an image!");
        }
    }

    function handleActivityEdit(e) {
        e.preventDefault();
        var data = objectifyForm($(e.target).serializeArray());
        if (data.activityId === undefined || data.activityId === '') {
            if (data.activityImageChanged === 'false') {
                alert("Please select an image");
                return;
            }
        }
        $('#cover-spin').show(0)
        $.post('<?= $base_url ?>admin/ajax/activities.php', {
            data: JSON.stringify(data),
        }, function(res) {
            res = JSON.parse(res);
            if (res.success) {
                $('.modal-backdrop').remove();
                editActivityModal.toggle();
                $('#editActivityContainer').load('<?= $base_url ?>admin/edit_activities.php?refresh=true');
            } else {
                alert(res);
            }
        });
    }
</script>

<?php
if (isset($_GET['refresh'])) {
?>
    <script>
        new bootstrap.Modal(document.getElementById('editActivitiesDialog'), {}).show();
        setTimeout(() => {
            $('#cover-spin').hide();
        }, 1000);
    </script>
<?php
    $conn->close();
}

?>