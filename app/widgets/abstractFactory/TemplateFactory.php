<?php
namespace app\widgets\abstractFactory;

/**
 * Интерфейс Абстрактной фабрики объявляет создающие методы для каждого
 * определённого типа продукта.
 */
interface TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate;

    public function createPageTemplate(): PageTemplate;

    public function getRenderer(): TemplateRenderer;
}