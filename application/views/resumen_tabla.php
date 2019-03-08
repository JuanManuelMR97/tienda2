<table>
    <thead>
        <tr>
            <td>Artículo</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->cart->contents() as $item): ?>
            <tr>
                <td>
                    <h4><?= $item['name'] ?></h4>
                </td>
                <td>
                    <p><?= $item['price'] ?> €</p>
                </td>
                <td>
                    <p><?= $item['qty'] ?></p>
                </td>
                <td>
                    <p><?= $item['subtotal'] ?> €</p>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<section>
    <div>
        <div>
            <div>
                <div>
                    <ul>
                        <li>Subtotal: <span><?= $this->cart->total(); ?> €</span></li>
                        <li>IVA: <span>21%</span></li>
                        <li>Gastos de envío: <span>Gratis</span></li>
                        <li>Total: <span><?= number_format($this->cart->total() * 1.21, 2); ?> €</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>