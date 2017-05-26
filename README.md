## ![](https://raw.githubusercontent.com/TsSaltan/DevelNext-GZip/master/src/.data/img/develnext/bundle/gzip/gzip.png) DevelNext GZip Bundle
Пакет расширений для работы gzip функциями. Есть совместимость с gz функциями оригинального php, т.е. закодированные на сервере данные можно раскодировать в DevelNext (и наоборот).

### Поддерживаемые функции
```php
/**
 * Сжимает строку в формате GZIP 
 * @param string $data Данные для сжатия
 * @link http://php.net/manual/function.gzencode.php
 */
function gzencode($data);

/**
 * Распаковывает строку, упакованную с помощью GZIP
 * @param string $data Данные для распаковки, упакованные с помощью gzencode()
 * @link http://php.net/manual/function.gzdecode.php
 */
function gzdecode($data);

/**
 * Cжимает строку используя формат данных ZLIB
 * @param string $data Данные для сжатия
 * @link http://php.net/manual/function.gzcompress.php
 */
function gzcompress($data);

/**
 * Распаковывает строку, упакованную с помощью ZLIB
 * @param string $data Данные, сжатые функцией gzcompress()
 * @link http://php.net/manual/function.gzuncompress.php
 */
function gzuncompress($data);

/**
 * Сжимает строку, используя формат данных DEFLATE
 * @param string $data Данные для сжатия
 * @link http://php.net/manual/function.gzdeflate.php
 */
function gzdeflate($data);

/**
 * Распаковывает строку, упакованную с помощью DEFLATE
 * @param string $data Данные, сжатые функцией gzdeflate()
 * @link http://php.net/manual/function.gzinflate.php
 */
function gzinflate($data);
```

### Changelog
```
--- 0.1 ---
[Add] gzencode, gzdecode, gzcompress, gzuncompress, gzdeflate, gzinflate
```

### Bugs
```
- Функции работают только в главном (GUI) потоке
```

В пакете используется библиотека [zlib.js](https://github.com/imaya/zlib.js/)