#include <iostream>
#include <string>
using namespace std;

int risk = 0;


 /*level of risk for disease, 0 = no elevated risk,
 1 = possible carrier, 2 = elevated risk, 3 = very high risk*/

int main(int argc, char** argv)
{
	//insert data grab
	//Need an easier way to map data from args to the variables
	//Probably will need to create a loop with a dictionary and array
	//Which means the schema for the dic must be same as array
	//For now hardcode the data
	//C++ heavily types so idk an effective means yet
	//Consult with Tony on this one
	if (argc > 1) {
		const char* sex = argv[1];
		const char* motherpres = argv[2];
		const char* fatherpres = argv[3];
		const char* siblingpres = argv[4];

		if (strcmp(sex, "M") == 0)
		{
			if (strcmp(motherpres, "1")==0) {
				risk = 3;
			}
			
			else if (strcmp(siblingpres, "1")==0) {
				risk = 2;
			}
			else {
				risk = 0;
			}
		}
		else
		{
			if (strcmp(fatherpres, "1")==0) {

				if (strcmp(motherpres, "1")==0) {
					risk = 3;
				}
				else if (strcmp(siblingpres, "1")==0) {
					risk = 2;
				}
				else {
					risk = 1;
				}
			}
			else {

				if (strcmp(motherpres, "1") == 0) {

					risk = 1;
				}
				else if (strcmp(siblingpres, "1") == 0) {
						risk = 1;
				}
				else {
						risk = 0;
					}
				}	
			}
		} else {
		std::cout << "Error wrong input";
	}
	std::cout <<  risk;
}