    <div class="content">
        <div class="backcov">
            <div><img class="imdback" src="<?php echo $base_url; ?>assets/images/background covid-19.jpg" alt="covid-19 background"></div>
            <div class="down" id="information">
                <a class="downlink" href="#information">
                    Information
                </a>
            </div>
        </div>
        <div class="barretitre">
            <h1>Information Covid-19</h1>
        </div>
        <div class="boxinfo">
            <h5 col>
                La <strong>Covid-19</strong> est une maladie infectieuse émergente, appelée aussi la maladie à <strong>coronavirus 2019</strong> provoquée par le coronavirus SARS-CoV-2.<br>
                Elle est apparue à Wuhan le 16 novembre 20193, dans la province de Hubei (en Chine centrale), avant de se propager dans le monde.<br>
                L'Organisation mondiale de la santé (OMS) alerte dans un premier temps la République populaire de Chine et ses autres États membres, puis prononce l'état d'urgence de santé publique de portée internationale le 30 janvier 2020.<br>
                Le virus se transmet le plus souvent par contact étroit et prolongé : quand on se tient à moins de 1,5 mètre d’une personne infectée, sans protection (par protection on entend par exemple le masque porté par les deux personnes). Plus le contact est long et rapproché, plus le risque d'infection augmente.
            </h5>
        </div>
        <div class="barresoustitre">
            <h2>Mesure de prévention</h2>
        </div>
        <div class="boxsousinfo">
            <ul>
                <?php for ($iprevention = 0; $iprevention < count($prevention); $iprevention++) { ?>
                    <li>
                        <h5><?php echo $prevention[$iprevention]->descri; ?></h5>
                    </li>
                    <?php
                    if ($iprevention + 1 != count($prevention)) { ?>
                        <hr>
                <?php }
                } ?>
            </ul>
        </div>
        <div class="barresoustitre">
            <h2>Symptômes</h2>
        </div>
        <div class="boxsousinfo">
            <ul>
                <?php for ($isymptome = 0; $isymptome < count($symptome); $isymptome++) { ?>
                    <li>
                        <h5><?php echo $symptome[$isymptome]->descri; ?></h5>
                    </li>
                    <?php
                    if ($isymptome + 1 != count($symptome)) { ?>
                        <hr>
                <?php }
                } ?>
            </ul>
        </div>
        <div class="barresoustitre">
            <h2>Traitement</h2>
        </div>
        <div class="boxsousinfo">
            <ul>
                <?php for ($itraitement = 0; $itraitement < count($traitement); $itraitement++) { ?>
                    <li>
                        <h5><?php echo $traitement[$itraitement]->descri; ?></h5>
                    </li>
                    <?php
                    if ($itraitement + 1 != count($traitement)) { ?>
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