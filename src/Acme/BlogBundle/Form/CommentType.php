<?php

namespace Acme\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of CommentType
 *
 * @author Admin
 */
class CommentType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);

		$builder->add('Jméno', 'text');
		$builder->add('Text', 'textarea');
		$builder->add('Vložit', 'submit');
		
	}

}
