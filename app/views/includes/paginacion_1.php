<div class="paginacion">
    <p>Pagina Nº <?= $pagina ?> de <?= $total_paginas ?></p>
    <?php if ($pagina > 1): ?>
        <a href="?pagina=<?= $pagina - 1 ?>">« Anterior</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
        <a href="?pagina=<?= $i ?>" <?= $i == $pagina ? 'style="font-weight:bold;"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($pagina < $total_paginas): ?>
        <a href="?pagina=<?= $pagina + 1 ?>">Siguiente »</a>
    <?php endif; ?>
</div>