# RoomBook

[Live Demo](https://roombook.wasmer.app/)

![Изображение частей сайта.](/preview.jpg)

Тестовая тема сервиса бронирования переговорных комнат.

> Данные формы бронирования не сохраняются.

## Настройка

Для работы необходим плагин ACF.

- Создать группу полей для типа постов **Room**;
- Добавить поля:
	- Capacity
		- Type: Number
		- Capacity
		- Default value: 1
		- Validation: On
	- Equipment
		- Checkbox
		- Equipment
		- Choices ...
		- Return value: Label
	- Image
		- Type: Image
		- Image
		- Return format: Image ID
		- Validation: On
	- Availability
		- Type: Select
		- Availability
		- Choices:
			- true : Available
			- false : Unavailable
		- Default value: true
		- Return format: Both (Array)
		- Validation: On