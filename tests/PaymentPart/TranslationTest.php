<?php

namespace Sprain\Tests\SwissQrBill\PaymentPart;

use PHPUnit\Framework\TestCase;
use Sprain\SwissQrBill\DataGroup\Element\AdditionalInformation;
use Sprain\SwissQrBill\PaymentPart\Translation\Translation;

class TranslationTest extends TestCase
{
    /**
     * @dataProvider allTranslationsProvider
     */
    public function testAllByLanguage($locale, $exampleTranslation)
    {
        $translations = Translation::getAllByLanguage($locale);
        $this->assertSame($translations['paymentPart'], $exampleTranslation);
    }

    public function allTranslationsProvider()
    {
        return [
            ['de', 'Zahlteil'],
            ['fr', 'Section paiement'],
            ['it', 'Sezione pagamento'],
            ['en', 'Payment part']
        ];
    }

    /**
     * @dataProvider singleTranslationProvider
     */
    public function testGet($locale, $key, $translation)
    {
        $this->assertSame($translation, Translation::get($key, $locale));
    }

    public function singleTranslationProvider()
    {
        return [
            ['de', 'paymentPart', 'Zahlteil'],
            ['fr', 'paymentPart', 'Section paiement'],
            ['it', 'paymentPart', 'Sezione pagamento'],
            ['en', 'paymentPart', 'Payment part']
        ];
    }
}