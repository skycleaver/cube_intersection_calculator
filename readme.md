#Cube intersection calculator
It's not the best name, but hey.

This implements an algorithm to calculate
the volume of the intersection of two cubes.
It also has a Cube and a Coordinate class in
order to be able to test it.

The class that does the math has an interface
so you can switch it for a better one (for 
example, one that calculates intersection volume
of rotated cubes).

##Future improvements
Apart from the rotating bit mentioned above,
the Cube class will most likely need a factory,
as having to create a Coordinate object before
creating the Cube object sounds like something
a Factory should handle. For the moment it's
simple enough to leave it at that.

If rotation angles were to be added to the cubes,
my advice would be to a create a RotatedCube
class that has a Cube inside and the rotation of
each axis (composition, not inheritance).