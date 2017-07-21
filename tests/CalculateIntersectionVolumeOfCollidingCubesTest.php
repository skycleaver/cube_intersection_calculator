<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\Coordinate;
use src\Cube;
use src\CubeIntersectionCalculator;

class CalculateIntersectionVolumeOfCollidingCubesTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @param array $data
     */
    public function testVolumeIsTheExpectedOne(array $data)
    {
        $cube1 = new Cube(
            new Coordinate(
                $data['cube1']['coordinates']['x'],
                $data['cube1']['coordinates']['y'],
                $data['cube1']['coordinates']['z']
            ),
            $data['cube1']['length']
        );
        $cube2 = new Cube(
            new Coordinate(
                $data['cube2']['coordinates']['x'],
                $data['cube2']['coordinates']['y'],
                $data['cube2']['coordinates']['z']
            ),
            $data['cube2']['length']
        );

        $intersectionCalculator = new CubeIntersectionCalculator();
        $intersectionVolume = $intersectionCalculator->getIntersectionVolume($cube1, $cube2);

        $this->assertEquals($data['expected_result'], $intersectionVolume);
    }

    public function dataProvider(): array
    {
        return [
            [
                'colliding_cubes_x_axis' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 0.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => 5.0,
                            'y' => 0.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'expected_result' => 500.0
                ],
            ], [
                'colliding_cubes_y_axis' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 0.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 7.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'expected_result' => 300.0
                ]
            ], [
                'colliding_cubes_z_axis' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => 1.0,
                            'y' => 2.0,
                            'z' => 3.0,
                        ],
                        'length' => 6.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => 1.0,
                            'y' => 2.0,
                            'z' => 5.0,
                        ],
                        'length' => 4.0
                    ],
                    'expected_result' => 48.0
                ]
            ], [
                'non_colliding_cubes' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 0.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 0.0,
                            'z' => 20.0,
                        ],
                        'length' => 10.0
                    ],
                    'expected_result' => 0.0
                ]
            ], [
                'different_size_colliding_cubes' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => 0.0,
                            'y' => 0.0,
                            'z' => 0.0,
                        ],
                        'length' => 10.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => 4.0,
                            'y' => 4.0,
                            'z' => 4.0,
                        ],
                        'length' => 6.0
                    ],
                    'expected_result' => 64.0
                ]
            ],
            [
                'negative_coordinates_colliding_cubes' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => -2.0,
                            'y' => -2.0,
                            'z' => -2.0,
                        ],
                        'length' => 10.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => -6.0,
                            'y' => -6.0,
                            'z' => -6.0,
                        ],
                        'length' => 12.0
                    ],
                    'expected_result' => 343.0
                ]
            ],
            [
                'cube_inside_another' => [
                    'cube1' => [
                        'coordinates' => [
                            'x' => -1.0,
                            'y' => -5.0,
                            'z' => -7.0,
                        ],
                        'length' => 2.0
                    ],
                    'cube2' => [
                        'coordinates' => [
                            'x' => -6.0,
                            'y' => -6.0,
                            'z' => -6.0,
                        ],
                        'length' => 12.0
                    ],
                    'expected_result' => 8.0
                ]
            ]
        ];
    }
}