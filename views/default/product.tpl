<h3> {$rsProduct['name']} </h3>

<img src="/images/products/{$rsProduct['image']}" alt="" width='575'>
Стоимость: {$rsProduct['price']}

<a id = 'removeCart_{$rsProduct["id"]}' href="#" alt = 'Добавить в корзину' onClick="removeFromCart({$rsProduct['id']}); return false;" {if !$itemInCart} class = 'hideme' {/if}> Удалить из корзины </a>
<a id = 'addCart_{$rsProduct["id"]}' href="#" {if $itemInCart} class = 'hideme' {/if} onClick="addToCart({$rsProduct['id']}); return false;" alt = 'Добавить в корзину'> Добавить в корзину </a>
<p> Описание: <br/> {$rsProduct['description']} </p>

