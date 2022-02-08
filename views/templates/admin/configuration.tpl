
<h2>{$superbanner_admin_link}</h2>
<div class="panel">
    <div class="panel-heading">{l s='Settings'}</div>
    <form action="{$superbanner_link}" method="POST">
        <div class="form-group">
            <label for="superbanner_path">{l s="Path"}</label>
            <input type="text" class="form-control" id="superbanner_path" name="superbanner_path" placeholder="/modules/superbanner/" value="{$superbanner_path}">
        </div>
        <div class="form-group">
            <label for="superbanner_width">{l s="Width"}</label>
            <input type="text" class="form-control" id="superbanner_width" name="superbanner_width" placeholder="200px" value="{$superbanner_width}">
        </div>
        <div class="form-group">
            <label for="superbanner_height">{l s="Height"}</label>
            <input type="text" class="form-control" id="superbanner_height" name="superbanner_height" placeholder="50px" value="{$superbanner_height}">
        </div>
        <button type="submit" class="btn btn-primary" name="submitConfiguration" value="1">{l s="save"}</button>
    </form>
</div>
