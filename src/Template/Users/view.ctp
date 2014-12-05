<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="users view large-10 medium-9 columns">
	<h2><?= h($user->title) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Title') ?></h6>
			<p><?= h($user->title) ?></p>
			<h6 class="subheader"><?= __('Fname') ?></h6>
			<p><?= h($user->fname) ?></p>
			<h6 class="subheader"><?= __('Lname') ?></h6>
			<p><?= h($user->lname) ?></p>
			<h6 class="subheader"><?= __('Username') ?></h6>
			<p><?= h($user->username) ?></p>
			<h6 class="subheader"><?= __('Email') ?></h6>
			<p><?= h($user->email) ?></p>
			<h6 class="subheader"><?= __('Password') ?></h6>
			<p><?= h($user->password) ?></p>
			<h6 class="subheader"><?= __('Phone') ?></h6>
			<p><?= h($user->phone) ?></p>
			<h6 class="subheader"><?= __('Image') ?></h6>
			<p><?= h($user->image) ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($user->id) ?></p>
			<h6 class="subheader"><?= __('Admin') ?></h6>
			<p><?= $this->Number->format($user->admin) ?></p>
			<h6 class="subheader"><?= __('Super') ?></h6>
			<p><?= $this->Number->format($user->super) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Address') ?></h6>
			<?= $this->Text->autoParagraph(h($user->address)); ?>

		</div>
	</div>
</div>
