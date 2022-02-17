<a href="index.php?page=note-create">Create</a>
<table border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Note Type</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($notes)): ?>
        <?php foreach ($notes as $note):?>
            <tr>
                <th><?php echo $note->id?></th>
                <td><?php echo $note->title?></td>
                <td><?php echo $note->content?></td>
                <td><?php echo $note->name?></td>
                <td><a href="index.php?page=note-detail&id=<?php echo $note->id?>">Detail</a></td>
                <td><a href="index.php?page=note-update&id=<?php echo $note->id?>">Update</a></td>
                <td><a onclick="return confirm('are you sure')" href="index.php?page=note-delete&id=<?php echo $note->id?>">Delete</a></td>


                </td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="3">Chưa có note nào</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
