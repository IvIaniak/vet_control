// Создание обработчика для события window.onLoad
YMaps.jQuery(function () {
    // Создание экземпляра карты и его привязка к созданному контейнеру
    var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]),

    traffic = new YMaps.Traffic.Control({           // Настройки элемента управления
        showInfoSwitcher: true,                     // Показать в кнопке переключатель "Дорожные события"
        infoLayerOptions: {                         // Опции слоя дорожных событий
            cursor: YMaps.Cursor.HELP
        }
        }, {                                            // Начальное состояние элемента управления
            shown: true,                                // Немедленно включить показ пробок
            infoLayerShown: true                        // Показывать слой дорожных событий
        });

    // Выставляет центр карты в центр Санкт-Петербурга
    map.setCenter(new YMaps.GeoPoint(30.726407,46.465265), 12);

  var typeControl = new YMaps.TypeControl([YMaps.MapType.MAP, YMaps.MapType.SATELLITE, YMaps.MapType.HYBRID], [1,2]);
    map.addControl(typeControl);
  map.addControl(new YMaps.ToolBar());
  map.addControl(new YMaps.Zoom());
  map.addControl(new YMaps.ScaleLine());
  map.addControl(new YMaps.SearchControl());

    // добавление элемента управления "Пробки" на карту
    map.addControl(traffic);
});
