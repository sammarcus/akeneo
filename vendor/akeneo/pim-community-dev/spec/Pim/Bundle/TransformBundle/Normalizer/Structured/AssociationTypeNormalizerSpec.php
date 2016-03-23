<?php

namespace spec\Pim\Bundle\TransformBundle\Normalizer\Structured;

use PhpSpec\ObjectBehavior;
use Pim\Bundle\CatalogBundle\Model\AssociationTypeInterface;
use Pim\Bundle\TransformBundle\Normalizer\Flat\TranslationNormalizer;
use Prophecy\Argument;

class AssociationTypeNormalizerSpec extends ObjectBehavior
{
    function let(TranslationNormalizer $transnormalizer, AssociationTypeInterface $association)
    {
        $this->beConstructedWith($transnormalizer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Pim\Bundle\TransformBundle\Normalizer\Structured\AssociationTypeNormalizer');
    }

    function it_is_a_normalizer()
    {
        $this->shouldImplement('Symfony\Component\Serializer\Normalizer\NormalizerInterface');
    }

    function it_supports_association_type_normalization_into_json_and_xml($association)
    {
        $this->supportsNormalization($association, 'csv')->shouldBe(false);
        $this->supportsNormalization($association, 'json')->shouldBe(true);
        $this->supportsNormalization($association, 'xml')->shouldBe(true);
    }

    function it_normalizes_association_type($transnormalizer, $association)
    {
        $transnormalizer->normalize(Argument::cetera())->willReturn([]);
        $association->getCode()->willReturn('PACK');

        $this->normalize($association)->shouldReturn(
            [
                'code' => 'PACK'
            ]
        );
    }
}
