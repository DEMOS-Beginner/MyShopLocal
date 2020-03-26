<h1> Товары категории {$rsCategory['name']} </h1>

{if count($rsProducts) > 0}
	{foreach $rsProducts as $item}

		<div style='float: left; padding: 0 30px 40px 0'>
			<a href="/product/{$item['id']}">
				<img src="/images/products/{$item['image']}" alt="" width = 100>
			</a><br>
			<a href="/product/{$item['id']}">{$item['name']}</a>
		</div>
		{if $item@iteration mod 3 == 0}
			<div style="clear: both;"></div>
		{/if}

	{/foreach}
{else if $rsCategory['parent_id'] != 0}
	<h2> Товаров данной категории не найдено! </h2>
{/if}
{foreach $rsChildCats as $item}
	<h2> <a href="/category/{$item['id']}">{$item['name']}</a> </h2>
{/foreach}