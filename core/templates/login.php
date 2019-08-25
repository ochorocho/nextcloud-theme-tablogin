<?php /** @var $l \OCP\IL10N */ ?>
<?php
script('core', 'tabs');
script('core', 'dist/login');

$alternateLogin = \OC::$server->getConfig()->getSystemValue('installed', false);
?>

<ul id="login-tabs" <?php if (!empty($_['alt_login'])) { ?>class="login-tabs"<?php } ?>>
    <li class="tabs">
        <?php if (!empty($_['alt_login'])) { ?>
            <div class="title <?php echo $alternateLogin ?: 'active' ?>" data-tab="tab-login">
                <?php p($l->t('Standard'));?>
            </div>
            <div class="title <?php echo $alternateLogin ? 'active' : '' ?>" data-tab="tab-alternate-login">
                <?php p($l->t('Alternate Login'));?>
            </div>
        <?php } ?>
    </li>
    <li <?php if (!empty($_['alt_login'])) { ?>class="tabs-content"<?php } ?>>
        <div id="tab-login" class="<?php echo $alternateLogin ?: 'active' ?>">
            <div id="login"></div>
        </div>
        <?php if (!empty($_['alt_login'])) { ?>
            <div id="tab-alternate-login" class="<?php echo $alternateLogin ? 'active' : '' ?>">
                <form id="alternative-logins">
                    <fieldset>
                        <ul>
                            <?php foreach($_['alt_login'] as $login): ?>
                                <li><a class="button" href="<?php print_unescaped($login['href']); ?>" ><?php p($login['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </fieldset>
                </form>
            </div>
        <?php } ?>
    </li>
</ul>
