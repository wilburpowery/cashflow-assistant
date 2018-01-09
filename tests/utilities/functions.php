<?php


/**
 * Create a new factory model and persist it.
 *
 * @param string $class
 * @param array  $attributes
 *
 * @return void
 */
function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}
/**
 * Create a new factory model but don't persist it.
 *
 * @param string $class
 * @param array  $attributes
 *
 * @return void
 */
function make($class, $attributes = [])
{
    return factory($class)->make($attributes);
}
