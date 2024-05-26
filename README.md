# Pet project to playgroound with RabbitMQ and event driven arquitecture [WIP]

## Description

This project is a simple example of how to use RabbitMQ to implement an event driven arquitecture. It is a simple example of a system that has a producer and a consumer. The producer sends a message to the RabbitMQ server and the consumer receives it and processes it.

The one of functionalities of the system is a "CRUD" of products, with some assyncronous messages by events. For example, when register new product, the customers are notified by email.

The another future functionalities are: update, delete and list products. Create a order and notify the sellers, update stock, etc.

## Features [WIP]

- [x] Create a product
  - [x] Send email to customers
- [ ] Update a product
- [ ] Delete a product
- [ ] List products
- [ ] List product by id
- [ ] Create a order
  - [ ] Send email to sellers
  - [ ] Update stock
- [ ] Update a order status
  - [ ] Notify the sellers
- [ ] List orders

## Technologies

- Laravel
- RabbitMQ
- Docker
- Docker Compose
- PHP
- Composer
- Nginx
- MySQL
- Mailtrap
- Redis
