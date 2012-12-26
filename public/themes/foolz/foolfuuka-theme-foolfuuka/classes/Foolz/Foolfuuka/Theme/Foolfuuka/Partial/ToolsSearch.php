<?php

namespace Foolz\Foolfuuka\Theme\Foolfuuka\Partial;

class ToolsSearch extends \Foolz\Theme\View
{

	public function toString()
	{
		$radix = $this->getBuilder()->getParamManager()->getParam('radix');

		if (is_null($radix) && \Preferences::get('fu.sphinx.global'))
		{
			// search can work also without a radix selected
			$search_radix = '_';
		}
		else if ( ! is_null($radix))
		{
			$search_radix = $radix->shortname;
		}

		if (isset($search_radix)) : ?>

        <ul class="nav pull-right">
		<?= \Form::open([
			'class' => 'navbar-search',
			'method' => 'POST',
			'action' => \Uri::create($search_radix.'/search')
		]);
	    ?>

        <li>
		<?= \Form::input([
			'name' => 'text',
			'value' => (isset($search["text"])) ? rawurldecode($search["text"]) : '',
			'class' => 'search-query',
			'placeholder' => ($search_radix  !== '_') ? __('Search or insert post number') : __('Search through all the boards')
		]); ?>
        </li>
		<?= \Form::close() ?>
        </ul>
		<?php endif;
	}
}