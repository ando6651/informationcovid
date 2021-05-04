<div class="content">
    <div class="barretitre">
        <h1><?php echo $title; ?></h1>
    </div>
    <div class="boxinfo" style="width: auto;margin-left: 6%;">
        <h2 style="color:black;">Statistique des cas</h2><br>
        <h5><strong>Confirmés</strong> : <?php echo intval($stat->nouveaucas); ?> (+<?php echo intval($laststat->nouveaucas); ?>) </h5>
        <h5><strong>Guérisons</strong> : <?php echo intval($stat->gueris); ?> (+<?php echo intval($laststat->gueris); ?>) </h5>
        <h5><strong>Décès</strong> : <?php echo intval($stat->deces); ?> (+<?php echo intval($laststat->deces); ?>)</h5>
        <h5><strong>En traitement</strong> : <?php echo (intval($stat->nouveaucas)-intval($stat->deces)+intval($stat->gueris)); ?></h5>
    </div>
    <div class="barresoustitre">
        <h2>Actualité</h2>
    </div>
    <div class="boxsousinfo" style="max-height: 600px;overflow-y: auto;">
        <ul>
            <?php for ($iactu = 0; $iactu < count($actu); $iactu++) { ?>
                <li>
                    <h4 style="color:black;"><?php echo $actu[$iactu]->dateevent; ?> - <strong><?php echo $actu[$iactu]->titre; ?></strong></h4>
                    <h5><?php echo $actu[$iactu]->evenement; ?></h5>
                </li><br>
                <?php
                if ($iactu + 1 != count($actu)) { ?>
                    <hr>
            <?php }
            } ?>
        </ul>
    </div>
</div>
<br>
<br>
</body>

</html>