== Установка/Обновление ==

<h2 style="text-align:center;color:#26901b;font-weight:bold;">Установка:</h2>
Т.к. это дополнение для WordPress плагина <a href="https://codeseller.ru/groups/plagin-wp-recall-lichnyj-kabinet-na-wordpress/" target="_blank">WP-Recall</a>, то оно устанавливается через <a href="https://codeseller.ru/obshhie-svedeniya-o-dopolneniyax-wp-recall/" target="_blank"><strong>менеджер дополнений WP-Recall</strong></a>.

1. В админке вашего сайта перейдите на страницу "WP-Recall" -> "Дополнения" и в самом верху нажмите на кнопку "Обзор", выберите .zip архив дополнения на вашем пк и нажмите кнопку "Установить".
2. В списке загруженных дополнений, на этой странице, найдите это дополнение, наведите на него курсор мыши и нажмите кнопку "Активировать". Или выберите чекбокс и в выпадающем списке действия выберите "Активировать". Нажмите применить.


<h2 style="text-align:center;color:#26901b;font-weight:bold;">Обновление:</h2>
Дополнение поддерживает <a href="https://codeseller.ru/avtomaticheskie-obnovleniya-dopolnenij-plagina-wp-recall/" target="_blank">автоматическое обновление</a> - два раза в день отправляются вашим сервером запросы на обновление.
Если в течении суток вы не видите обновления (а на странице дополнения вы видите что версия вышла новая), советую ознакомиться с этой <a href="https://codeseller.ru/post-group/rabota-wordpress-krona-cron-prinuditelnoe-vypolnenie-kron-zadach-dlya-wp-recall/" target="_blank">статьёй</a>




== Настройки ==
1. Вы создаете (регистрируете) нового пользователя на своем сайте. Например "Автобот"
2. Логинетесь им на сайте, загружаете ему аватарку, обложку, выставляете отображаемое имя
3. В админке, в списке пользователей находите его и наводите курсор на его логин или "изменить" - <a href="https://yadi.sk/i/6lWNkCrO3QXyuw" target="_blank">скриншот</a> 
Слева внизу увидите его id
4. Этот id вставляете в настройках дополнения: WP-Recall -> Настройки -> Настройки AutoBot и сохраняете
Теперь система будет знать - кабинет какого пользователя ей изменить

Если у вас стоят дополнения: <a href="https://codeseller.ru/?p=8341" target="_blank">Hello private message</a>, <a href="https://codeseller.ru/?p=8350" target="_blank">Bonus on Registration</a> или <a href="https://codeseller.ru/?p=16774" target="_blank">Subscription Two</a> то этот же id указывайте в их настройках и они начнут отправлять сообщения от имени Автобота



== FAQ ==
<h3 style="color:#26901b;font-weight:bold;">С какими дополнениями он работает:</h3>

<a href="https://codeseller.ru/?p=8341" target="_blank">Hello private message</a>
<a href="https://codeseller.ru/?p=8350" target="_blank">Bonus on Registration</a>
<a href="https://codeseller.ru/?p=16774" target="_blank">Subscription Two</a>

+дополнения чат-ботов 
<a href="https://codeseller.ru/?p=17441" target="_blank">Bot AnekBot (анекдоты)</a>
<a href="https://codeseller.ru/?p=17446" target="_blank">Bot Bash.org (истории с Bash.org)</a>
<a href="https://codeseller.ru/?p=17450" target="_blank">Bot Exchange Rates (курсы доллара и евро)</a>
<a href="https://codeseller.ru/?p=17454" target="_blank">Bot Rules (правила чата)</a>
<a href="https://codeseller.ru/?p=17458" target="_blank">Bot User Info (информация о пользователе и краткая статистика)</a>
<a href="https://codeseller.ru/?p=17655" target="_blank">Bot Weather In The City (Погода в заданном городе)</a>

<hr style="border:1px solid #ddd;margin:18px;">


<h3 style="color:#26901b;font-weight:bold;">Не могу ему написать:</h3>
всё верно - это односторонний чат для уведомлений

<hr style="border:1px solid #ddd;margin:18px;">


<h3 style="color:#26901b;font-weight:bold;">Работа с какими шаблонами личного кабинета проверялась:</h3>
Sunshine, Grace, Across Ocean, Across Ocean - PRO, Clear Sky, Line, Simple Theme, Theme Control

<hr style="border:1px solid #ddd;margin:18px;">


<h3 style="color:#26901b;font-weight:bold;">Какие еще варианты использования:</h3>
- если надо пользователю выслать предупреждение за какое либо нарушение без обсуждения - Автобот идеальный инструмент. Непрочитанное в течении часа сообщение отправится пользователю на его e-mail.
Авторизуйтесь им на своем сайте и отправляйте сообщение как в обычном чате в личных сообщениях.

<hr style="border:1px solid #ddd;margin:18px;">


<h3 style="color:#26901b;font-weight:bold;">Есть описание API и работы с ним? как расширить?</h3>
- да. В одной записи я сделал обзор некоторых функций и пример добавления чат-бота: <a href="https://codeseller.ru/?p=17464" target="_blank">Пишем дочернее дополнение для WP-Recall — чат-бот погоды в городе (используя ядро допа AutoBot Cabinet)</a> 




== Changelog ==
= 2020-09-22 =
v3.2.0
* Поддержка WP-Recall 16.24.0
* Перевел на апи реколл кнопок - меньше css стилей


= 2020-03-25 =
v3.1.0
* поддержка Theme Control 2.0


= 2018-10-31 =
v3.0
* реорганизация и рефакторинг    
* поддержка Float Chat v2.0
* fix: в кабинете автобота, запустив всплывающий чат (доп Float Chat) - была скрыта форма общения
* fix: если заходили в чат (общий чат или ЛС), и запускали всплывающий чат (доп Float Chat) - по клику на команды ботов ответы приходили не в тот чат
* небольшие коррекции с шаблонам личного кабинета если мы в кабинете автобота. Коррекция высоты шапки и размера аватарки
* везде доступна js-переменная Rcl.autobot - содержит id автобота


= 2018-10-09 =
v2.3  
* небольшие критичные инлайн скрипты/стили сжаты в одну строку
* перевел всю работу функционала на константу AUTOBOT_ID
* fix - при ajax переходе на вкладку списка контактов: всплывающий чат у автобота - было видно поле для ответа. Убрал его
* fix - гостю грузился ненужный скрипт
* fix - если в настройках автобота не был указан id бота - была ошибка js


= 2018-10-08 =
v2.2  
* Поддержка WP-Recall 16.16


= 2018-09-20 =
v2.1  
* В списке контактов, на вкладке "Чат", в всплывающем окне пофиксил ситуацию - когда можно было писать автоботу.


= 2018-03-12 =
v2.0
* Новый функционал для поддержки сторонних ботов (есть мануал - читай FAQ)
* Константа <code>AUTOBOT_ID</code> - позволяет легко получить идентификатор автобота. Полезно для сторонних чат-ботов


= 2018-01-30 =
v1.2
* В кабинете автобота (если он зайдет сам в свой профиль) все вкладки скроются кроме ЛС и Профиль.
* В миничате (плавающая панелька чата сбоку) убрал возможность написать автоботу сообщение (спасибо за репорт Liter-rm)


= 2018-01-04 =
v1.1
* Исправлено падение в админке в режиме мультисайта - на панели управления сайтами (Управление сетью->Консоль)
Баг мультисайта описан здесь https://otshelnik-fm.ru/?p=3629


= 2017-12-22 =
v1.0
* Release





== Прочее ==

* Поддержка осуществляется в рамках текущего функционала дополнения
* При возникновении проблемы, создайте соотвествующую тему на форуме поддержки товара
* Если вам нужна доработка под ваши нужды - вы можете обратиться ко мне в <a href="https://codeseller.ru/author/otshelnik-fm/?tab=chat" target="_blank">ЛС</a> с техзаданием на платную доработку.

Все мои работы опубликованы <a href="https://otshelnik-fm.ru/?p=2562" target="_blank">на моём сайте</a> и в каталоге магазина <a href="https://codeseller.ru/author/otshelnik-fm/?tab=publics&subtab=type-products" target="_blank">CodeSeller.ru</a>
