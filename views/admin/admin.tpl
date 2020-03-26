<div id="blockNewCategory">
	Новая категория:
		<input type="text" id="newCategoryName" name='newCategoryName' value = ''>
		<br>
	Является подкатегорией для:
		<select name="generalCatId">
			<option value="0">Главная категория</option>
			{foreach $rsCategories as $item name=categories}
				<option value="{$item['id']}">{$item['name']}</option>
			{/foreach}
		</select>
	<input type="button" onclick='newCategory();' value='Добавить категорию'>
</div>