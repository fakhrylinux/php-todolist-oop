<?php

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;


require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

function testShowTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Canada");
    $todolistRepository->todolist[2] = new Todolist("New Zealand");
    $todolistRepository->todolist[3] = new Todolist("Finland");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Canada");
    $todolistService->addTodoList("Japan");
    $todolistService->addTodoList("Australia");
    $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Canada");
    $todolistService->addTodoList("Japan");
    $todolistService->addTodoList("Australia");

    $todolistService->showTodolist();

    $todolistService->removeTodolist(3);
    $todolistService->removeTodolist(2);
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
}

testRemoveTodolist();