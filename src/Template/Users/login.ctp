<div class="users form">
    <?=$this->Flash->render('auth') ?>
    <?=$this->Form->create() ?>
    <fieldset>
        <legend>アカウント名とパスワードを入力してください</legend>
        <?=$this->Form->input('name') ?>
        <?=$this->Form->input('password') ?>
    </fieldset>
    <?=$this->Form->button('ログイン') ?>
    <?=$this->Form->end() ?>
</div>