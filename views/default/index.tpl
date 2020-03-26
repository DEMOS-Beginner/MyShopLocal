<!-- Шаблон главной страницы -->

{foreach $rsProducts as $item name=products}

	<div style='float: left; padding: 0 30px 40px 0; overflow: hidden; width: 100px; margin: 20px'>
		<a href="/product/{$item['id']}">
			<img src="/images/products/{$item['image']}" alt="" width = 100>
		</a><br>
		<a href="/product/{$item['id']}">{$item['name']}</a>
	</div>
	{if $item@iteration mod 3 == 0}
		<div style="clear: both;"></div>
	{/if}

{/foreach}