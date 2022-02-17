<form action="" method="post">
    <input type="text" name="title">
    <input type="text" name="content">
    <select name="type_id" id="">
        <?php foreach ($noteTypes as $noteType): ?>
        <option value="<?php echo $noteType->id?>"><?php echo $noteType->name?></option>
        <?php endforeach; ?>
    </select>
    <button>Create</button>
</form>

